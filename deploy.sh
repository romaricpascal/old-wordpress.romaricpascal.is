SCRIPT=$(readlink -f "$0")
SCRIPTPATH=$(dirname "$SCRIPT")

deploy_id=romaricpascal.is-`date '+%y%m%d%H%M%S'`
workdir=`pwd`/../deploy/$deploy_id
archive_path=$workdir.tar.gz
branch=master

: ${1?"The script needs to know which host to deploy to. './deploy.sh <host> <target>'"}
host=$1

: ${2?"The script needs to know in which folder to deploy. './deploy.sh <host> <target>'"}
target=$2

branch=$3

echo "Making clean install"
echo "- Cloning repo"
git clone . $workdir
git checkout $branch

echo "- Installing PHP deps"
(cd $workdir/www && composer install )

echo "- Building WP theme"
(cd $workdir/www/wp-content/themes/romaricpascal.is && yarn install && yarn run build)

echo "- Installing fonts"
(cp -r ../fonts $workdir/www/wp-content/themes/romaricpascal.is/assets)

echo "Packaging project before upload"

echo " - Removing unnecessary build files"
(cd $workdir/www && rm -rf vendor scripts)

echo " - Creating tarball"
(cd $workdir/www && pwd && tar -X "$SCRIPTPATH/.rsyncignore" --exclude=$workdir/www/vendor -cvzf $archive_path *)

echo "Copying to remote server"
scp $archive_path $host:.

# RESTART HERE: Extract archive on remote server, copy resources & swap folders
ssh $host <<-ENDSH

  echo "Expanding archive"
  mkdir $deploy_id
  tar -xvzf $deploy_id.tar.gz -C $deploy_id

  echo "Copying current content over to new deployment"
  [ -e $target/.htaccess ] && cp -r $target/.htaccess $deploy_id
  [ -e $target/.htpasswd ] && cp -r $target/.htpasswd $deploy_id
  [ -e $target/.env.php ] && cp -r $target/.env.php $deploy_id

  echo "Linking uploads folder"
  ln -s ~/data/$target/uploads $deploy_id/wp-content/uploads

  echo "Linking ewww folder"
  ln -s ~/data/$target/ewww $deploy_id/wp-content/ewww

  echo "Swapping old deployment for new one"
  [ -e "$target-old" ] && rm -r "$target-old"
  mv $target $target-old
  mv $deploy_id $target

  echo "Cleaning up remote files"
  rm "$deploy_id.tar.gz"

ENDSH

# echo "Cleaning up local files"
# rm -rf "$workdir*"
