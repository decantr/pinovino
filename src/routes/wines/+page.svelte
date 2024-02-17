<script>
	import Header from "$lib/Header.svelte";
	import { getFlagEmoji } from "$lib/helpers";

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

<main>
	<section>
		<header>
			<h2>
				A list of all the wines in the database
			</h2>
			<p>
				<a href="/wines/create">Add new Wine</a>
			</p>
		</header>
		<table>
			<thead>
				<tr>
					<th>Wine</th>
					<th>Vintage</th>
					<th>Country</th>
					<th>Region</th>
					<th>Type</th>
					<th>Grapes</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				{#each data.wines as wine}
					<tr>
						<td><a href="/wines/{wine.id}">{wine.name}</a></td>
						<td>{wine.vintage}</td>
						<td style="font-size: 2rem;">{getFlagEmoji(wine.country)}</td>
						<td>{wine.region}</td>
						<td>{wine.type}</td>
						<td style="white-space: normal;">{ wine.grapes.join(", ") }</td>
						<td>
							<button on:click={addPurchase(wine.id)}>
							Add Purchase
							</button>
						</td>
					</tr>
				{/each}
			</tbody>
		</table>
	</section>
</main>
