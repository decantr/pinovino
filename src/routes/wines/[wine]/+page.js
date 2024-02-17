import { pb } from '$lib/pocketbase';
import { error } from '@sveltejs/kit';

/** @type {import('./$types').PageLoad} */
export async function load({ params }) {
	if (!params.wine) {
		error(404, 'Not Found');
	}

	// Fetch the wine from the API
	const wine = await pb.collection('wines')
		.getOne(params.wine)
		.catch(e => console.error('a', e));

	const ratings = await pb.collection('ratings')
		.getList(1, 50, {
			filter:`wine_id="${params.id}"` 
		});

    return {
		wine,
		ratings: ratings.items,
	};
};