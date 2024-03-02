<script>
	import { currentUser, pb } from "./pocketbase";

	function signOut() {
		pb.authStore.clear();
	}
</script>

<nav class="bg-indigo-400 px-8 py-4 mb-8 flex flex-wrap text-white">
	<a href="/" class="flex items-center fill-white">
		<span class="size-8 flex items-center justify-center">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-6 m-auto">
			<!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
			<path d="M64 0C47.4 0 33.5 12.8 32.1 29.3l-14 168.4c-6 72 42.5 135.2 109.9 150.6V448H80c-17.7 0-32 14.3-32 32s14.3 32 32 32h80 80c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V348.4c67.4-15.4 115.9-78.6 109.9-150.6l-14-168.4C286.5 12.8 272.6 0 256 0H64zM81.9 203.1L93.4 64H226.6l11.6 139.1C242 248.8 205.9 288 160 288s-82-39.2-78.1-84.9z"/>
		</svg>
		</span>

		<h1 class="text-2xl font-semibold">pinovino</h1>
	</a>


	<div class="ml-auto">
		{#if $currentUser}
			<div class="flex items-center gap-4 ml-auto p-2 rounded">
				<span>Hi <span class="underline">{$currentUser.name}</span></span>
				<button type="button" on:click={signOut} class="rounded border px-4 font-semibold p-2">Logout</button>
				{#if $currentUser.avatar}
					<img
						class="avatar"
						src={pb.files.getUrl($currentUser, $currentUser.avatar)}
						alt="avatar"
						width="40px"
					/>
				{/if}
			</div>
		{/if}
	</div>
</nav>
