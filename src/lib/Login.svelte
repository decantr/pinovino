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
	<form on:submit={login}>
		<label for="username">Username</label>
		<input
		id="username"
			placeholder="Username"
			type="text"
			bind:value={username}
			required
		/>

		<label for="password">Password</label>
		<input
			size="50"
			id="password"
			placeholder="Password"
			type="password"
			bind:value={password}
			required
		/>
		<button>Login</button>
	</form>
{/if}
