const button = document.querySelector('.download')
const modal = new bootstrap.Modal(document.querySelector('.modal'))
const form = document.querySelector('.modal form')
const rating = document.querySelector('[name=star]')
const stars = document.querySelectorAll('.star')

const fillStar = (e) => {
	const stared = document.querySelectorAll('.star.text-warning').length
	let star = e.target.id

	star = star != stared ? star : 0

	for (var i = 0; i < 5; i++) {
		if (i < star) {
			stars[i].classList.add('text-warning')
		} else {
			stars[i].classList.remove('text-warning')
		}
	}

	rating.value = star
}

button.onclick = function () {
	url = downloadUrl.replace(':id', this.id)
	form.action = url
	modal.show()
}

form.onsubmit = () => modal.hide()

stars.forEach(star => star.onclick = fillStar)