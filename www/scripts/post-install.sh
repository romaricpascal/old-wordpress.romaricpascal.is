SCRIPT=$(readlink -f "$0")
SCRIPTPATH=$(dirname "$SCRIPT")

# Generate wordpress salts
php $SCRIPTPATH/generate-salts.php
# Patch Redirection plugin
(cd wp-content/plugins/redirection && patch -p1 < $SCRIPTPATH/patches/redirection-hierarchical-post-monitoring.patch);