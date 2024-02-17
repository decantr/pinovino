<script lang="ts">
	import Header from "$lib/Header.svelte";
	import Login from "$lib/Login.svelte";
	import { currentUser } from "$lib/pocketbase";
</script>

<header>
	<Header />
</header>

<main>
	<Login />

	<section>
	{#if $currentUser}
		<h1>Welcome to pinovino</h1>

		<p>
			<a href="/wines">View Wines</a>
			<a href="/ratings">View Ratings</a>
			<a href="/wines/create">Add new Wine</a>
		</p>
	{/if}

	</section>
</main>
