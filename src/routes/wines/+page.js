import { pb } from '$lib/pocketbase';

/** @type {import('./$types').PageLoad} */
export async function load() {
	let wines = [];
	const results = await pb
		.collection("wines")
		.getList(1, 50, { sort: "created", });

	/** @type {import('$lib/types').Wine[]} */
	wines = results.items;

    return {
		wines,
	};
};