<script lang="ts">
	import Header from "$lib/Header.svelte";
	import Login from "$lib/Login.svelte";
	import { currentUser } from "$lib/pocketbase";
</script>

<header>
	<Header />
</header>

<main class="container">
	<Login />

	<section class="my-auto p-8">
		{#if $currentUser}
			<h1 class="text-4xl">Welcome to <span class="text-primary">pinovino</span></h1>

			<div class="my-8 flex gap-4 justify-center">
				<a class="btn btn-primary" href="/wines">View Wines</a>
				<a class="btn btn-primary" href="/ratings">View Ratings</a>
				<a class="btn btn-success" href="/wines/create">Add new Wine</a>
			</div>
		{/if}
	</section>
</main>
