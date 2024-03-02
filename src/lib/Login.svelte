<script>
	import { currentUser, pb } from "./pocketbase";

	/** @type {string} */
	let username;
	/** @type {string} */
	let password;
	/** @type {string} */
	let error = "";

	async function login() {
		await pb.collection("users").authWithPassword(username, password);
	}

	function signOut() {
		pb.authStore.clear();
	}
</script>

{#if !$currentUser}
	<form on:submit={login} class="border-2 shadow border-indigo-400 flex flex-col p-8 rounded-md gap-8 my-auto">

		<fieldset class="flex flex-col">
			<label class="text-lg" for="username">Username</label>
			<input
				id="username"
				placeholder="Username"
				type="text"
				bind:value={username}
				required
				class="rounded p-2 border-2 border-indigo-400 shadow"
			/>
		</fieldset>

		<fieldset class="flex flex-col">
			<label class="text-lg" for="password">Password</label>
			<input
				size="50"
				id="password"
				placeholder="Password"
				type="password"
				bind:value={password}
				required
				class="rounded p-2 border-2 border-indigo-400 shadow"
			/>
		</fieldset>

		<button class="bg-indigo-400 rounded shadow p-2 text-white hover:bg-indigo-500">Login</button>
	</form>
{/if}
