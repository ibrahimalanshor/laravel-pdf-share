const input = document.querySelector('[name=category]')
var controller

const tagify = new Tagify(input, {
	whitelist: [],
	maxTags: 4,
	originalInputValueFormat: valuesArr => valuesArr.map(item => item.value)
})

const search = e => {
	const value = e.detail.value
	tagify.settings.whitelist.length = 0

	controller && controller.abort()
	controller = new AbortController()

	tagify.loading(true).dropdown.hide.call(tagify)

	fetch(searchUrl, {
		method: 'post',
		headers: {
			"X-CSRF-Token": csrf
		},
		body: JSON.stringify({
			name: value,
		}),
		signal: controller.signal
	}).then(res => res.json()).then(whitelist => {
		tagify.settings.whitelist.splice(0, whitelist.length, ...whitelist)
		tagify.loading(false).dropdown.show.call(tagify, value)
	})
}

tagify.on('input', search)