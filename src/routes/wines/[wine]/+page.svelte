<script>
	import Header from "$lib/Header.svelte";
	import { pb } from "$lib/pocketbase";

	/** @type {import('./$types').PageData} */
	export let data;

	async function addImage() {
		const form_data = new FormData();
		const file_input = document.getElementById("file_input");

		if (!file_input.files.length) {
			return;
		}

		form_data.append("image", file_input.files[0]);

		data.wine = await pb
			.collection("wines")
			.update(data.wine.id, form_data);
	}
</script>

<header>
	<Header />

	<h1>Wine Details</h1>
	<a href="/wines">Back to wines</a>
</header>

<main>
	<section>
		<aside>
			{#if data.wine?.image}
				<img
					src={pb.files.getUrl(data.wine, data.wine.image)}
					alt={data.wine.name}
				/>
			{/if}
			<input
				type="file"
				name="image"
				id="file_input"
				on:change={addImage}
			/>

			<h2>{data.wine?.name}</h2>
			<p>
				{data.wine?.type} from {data.wine?.region}
			</p>
			{@html data.wine?.description}
			<a href="/wines/{data.wine.id}/edit">Edit</a>
		</aside>

		<aside>
			<h3>Ratings</h3>
			<ul>
				{#each data.ratings as review}
					<li>
						<blockquote>
							{review.text}
						</blockquote>
						<cite>{review.author}</cite>
					</li>
				{/each}
			</ul>
			<a href="/wines/{data.wine.id}/ratings/create">Add a review</a>
		</aside>
	</section>
</main>