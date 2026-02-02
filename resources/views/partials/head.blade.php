<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Pinovino' }}</title>

<link rel="icon" href="favicon.ico" sizes="16x16">
<link rel="icon" href="favicon.svg" type="image/svg+xml" sizes="any">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

<script>
	document.addEventListener("alpine:init", () => {

		Alpine.magic("copy", (el, Alpine) => {
			return subject => {
				if (!subject) {
					subject = el.innerText;
				}

				navigator.clipboard && navigator.clipboard.writeText(subject);
				Flux.toast({ text: "Copied to clipboard", variant: "success", duration: 3000 });
			};
		});
	});

</script>
