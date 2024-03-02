<script>
	import { goto } from "$app/navigation";
	import Header from "$lib/Header.svelte";
	import { pb } from "$lib/pocketbase";

	/** @type {import('./$types').PageData} */
	export let data;

	// wine properties
	let name = "";
	let type = "red";
	let vintage = 2021;
	let grapes = "";
	let country = "";
	let region = "";
	let description = "";

	async function save() {
		/** @type {import('$lib/types').Wine} */
		const wine = {
			name,
			type,
			vintage,
			grapes: grapes.split(","),
			country,
			region,
			description,
			notes: "",
			image: null,
		};

		const new_wine = await pb.collection("wines").create(wine);

		goto("/wines/" + new_wine.id);
	}
</script>

<header>
	<Header />
</header>

<main class="container">
	<section class="grid grid-cols-1 gap-8 md:grid-cols-3">
		<div class="px-4 sm:px-0">
			<h2 class="text-base font-semibold leading-7">Add a New Wine</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">
				Use this form to an a new wine to the collection. Anyone will then be able to add their own personal purchase list to the wine.
			</p>

			<a href="/wines" class="mt-4 text-sm text-indigo-600 hover:underline">
				Back to wines
			</a>
		</div>

		<form on:submit={save} class="form px-8 md:col-span-2">
			<label for="name">
				<h5>Name <span class="text-danger">*</span></h5>

				<input
					bind:value={name}
					id="name"
					placeholder="Name of the wine..."
					required
					type="text"
				/>
			</label>

			<label for="type">
				<h5>
					Type <span class="text-danger">*</span>
				</h5>

				<select bind:value={type} id="type" required>
					<option value="red">Red</option>
					<option value="white">White</option>
					<option value="rose">Rosé</option>
					<option value="sparkling">Sparkling</option>
				</select>
			</label>

			<label for="year">
				<h5>Vintage <span class="text-danger">*</span></h5>

				<input
					bind:value={vintage}
					id="year"
					placeholder="Year of the wine..."
					required
					type="number"
				/>
			</label>

			<label for="grapes">
				<h5>Grapes</h5>
				<input
					bind:value={grapes}
					id="grapes"
					placeholder="Grapes used in the wine..."
					type="text"
				/>
			</label>

			<label for="region">
				<h5>Region</h5>
				<input
					bind:value={region}
					id="region"
					placeholder="Region of the wine..."
					type="text"
				/>
			</label>

			<label for="description">
				<h5>Description</h5>

				<textarea
					bind:value={description}
					id="description"
					placeholder="Description of the wine..."
				></textarea>
			</label>

			<label for="country">
				<h5>Country</h5>

				<input
					bind:value={country}
					id="country"
					placeholder="Country of the wine..."
					type="text"
					list="countries"
				/>
				<datalist id="countries">
					<option value="AR">Argentina</option>
					<option value="AU">Australia</option>
					<option value="FR">France</option>
					<option value="IT">Italy</option>
					<option value="NZ">New Zealand</option>
					<option value="PT">Portugal</option>
					<option value="ES">Spain</option>
					<option value="CH">Switzerland</option>
					<option value="DE">Germany</option>
					<option value="GB">United Kingdom</option>
					<option value="US">United States</option>
					<option value="ZA">South Africa</option>
				</datalist>
			</label>

			<div class="ml-auto space-x-8">
				<a class="btn w-16" type="button" href="/wines">Cancel</a>

				<button type="submit" class="btn btn-success w-32">Save</button>
			</div>
		</form>
	</section>
</main>
