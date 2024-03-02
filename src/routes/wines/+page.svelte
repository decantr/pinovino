<script>
	import Header from "$lib/Header.svelte";
	import { getFlagEmoji } from "$lib/helpers";
    import { pb } from "$lib/pocketbase";

    /** @type {import('./$types').PageData} */
    export let data;

	/** * @param {string} wine_id */
	function addPurchase(wine_id) {
		console.log(wine_id);
	}
</script>

<header>
	<Header />
</header>

<main class="container">
	<section>

		<header class="my-8 flex max-w-2xl mx-auto items-center">
			<p class="text-muted">
				A list of all the wines in the database
			</p>
			<a class="btn btn-primary ml-auto" href="/wines/create">Add new Wine</a>
		</header>


		<table class="table table-links">
			<thead>
				<tr class="bg-primary-accent h-12">
					<th class="w-32">Image</th>
					<th>Wine</th>
					<th class="w-16 max-md:hidden">Vintage</th>
					<th class="w-28 max-md:hidden">Country</th>
					<th>Region</th>
					<th>Type</th>
					<th>Grapes</th>
					<th class="w-28">
						<span class="sr-only">Log a new purchase</span>
					</th>
				</tr>
			</thead>

			<tbody>
				{#each data.wines as wine, i}
					<tr class:bg-accent={i % 2 === 1}>
						<td>
							{#if wine.image}
								<img
									src={pb.files.getUrl(wine, wine.image)}
									class="w-24 h-24 object-cover rounded-lg my-4"
									alt={wine.name}
								/>
							{/if}
						</td>

						<td class="rounded-l">
							<a href="/wines/{wine.id}" class="inline-block pl-2 w-full group full-link">
								<h2 class="font-semibold group-hover:underline">{wine.name}</h2>

								<div class="md:hidden flex">
									{getFlagEmoji(wine.country)} {wine.vintage}
								</div>
							</a>
						</td>

						<td class="max-md:hidden text-center">
							{wine.vintage}
						</td>

						<td class="max-md:hidden text-center" style="font-size: 2rem;">
							{getFlagEmoji(wine.country)}
						</td>
						<td>{wine.region}</td>
						<td class="text-center capitalize">
							<i
								class="fa-solid fa-wine-bottle fa-2xl"
								class:text-red-500={wine.type === "red"}
								class:text-white-500={wine.type === "white"}
								class:text-pink-400={wine.type === "rose"}
								class:text-yellow-500={wine.type === "sparkling"}
							/>
						</td>

						<td style="white-space: normal;">{ wine.grapes.join(", ") }</td>

						<td class="rounded-r">
							<button on:click={addPurchase(wine.id)} class="whitespace-nowrap underline hover:no-underline relative">
							Log Purchase
							</button>
						</td>
					</tr>
				{/each}
			</tbody>
		</table>
	</section>
</main>
