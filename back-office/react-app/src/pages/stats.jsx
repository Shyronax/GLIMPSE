import { Graphique } from "../components/Graphique";

export const Stats = () => {
	return (
		<div>
			<h1>Bonjour admin,</h1>
			<p>
				Voici les <strong>statistiques de fréquentation</strong> de
				l'exposition.
			</p>
			<Graphique />
		</div>
	);
};
