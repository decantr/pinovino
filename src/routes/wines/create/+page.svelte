<script>
	import { goto } from '$app/navigation';
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
			notes: '',
			image: null
		};

		const new_wine = await pb.collection('wines')
			.create(wine);
			
		goto('/wines/' + new_wine.id);
	}
</script>

<header>
	<Header />
</header>

<main>
	<section>
		<form on:submit={save}>
			<header>
				<h1>Add a new Wine</h1>
			</header>

			<label for="name">
				Name
				<span style="color: #ef4444;">*</span>
			</label>
			<input
				bind:value={name}
				id="name"
				placeholder="Name of the wine..."
				required
				type="text"
			/>

			<label for="type">
				Type
				<span style="color: #ef4444;">*</span>
			</label>
			<select bind:value={type} id="type" required>
				<option value="red">Red</option>
				<option value="white">White</option>
				<option value="rose">Rosé</option>
				<option value="sparkling">Sparkling</option>
			</select>

			<label for="year">
				Vintage
				<span style="color: #ef4444;">*</span>
			</label>
			<input
				bind:value={vintage}
				id="year"
				placeholder="Year of the wine..."
				required
				type="number"
			/>

			<label for="grapes">Grapes</label>
			<input
				bind:value={grapes}
				id="grapes"
				placeholder="Grapes used in the wine..."
				type="text"
			/>

			<label for="region">Region</label>
			<input
				bind:value={region}
				id="region"
				placeholder="Region of the wine..."
				type="text"
			/>

			<label for="description">Description</label>
			<textarea
				bind:value={description}
				id="description"
				placeholder="Description of the wine..."
			></textarea>

			<label for="country">Country</label>
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

			<button type="submit">Save</button>
		</form>
	</section>
</main>
