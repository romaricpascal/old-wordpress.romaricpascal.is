var progressBar = document.createElement('div');
progressBar.classList.add('rp-ProgressBar');
document.body.appendChild(progressBar);

export function	updateProgress(ratio) {
	progressBar.style.width = (100 * ratio) + '%';
}
export function	clearProgress() {
	updateProgress(0);
}