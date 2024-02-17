<script>
	import { currentUser, pb } from "./pocketbase";

	function signOut() {
		pb.authStore.clear();
	}
</script>

<nav>
	<a href="/">
		<h1>pinovino</h1>
	</a>

	{#if $currentUser}
		<ul>
			<li>
				<div style="display: flex; align-items: center; gap: 1rem;">
				{$currentUser.name}
				{#if $currentUser.avatar}
				<img
					class="avatar"
					src={pb.files.getUrl($currentUser, $currentUser.avatar)}
					alt="avatar"
					width="40px"
				/>
				{/if}
				</div>
				<ul>
					<li>
						<button type="button" on:click={signOut}>Logout</button>
					</li>
				</ul>
			</li>
		</ul>
	{/if}
</nav>
