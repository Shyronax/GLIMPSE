import { useEffect, useState } from "react";
import { Utilisateurs } from "../components/utilisateurs";

export const Accounts = () => {
	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/utilisateurs")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);
	return (
		<div>
			<h1>Gestion des comptes</h1>
			<p>Gérez les comptes utilisateurs du site de l’exposition.</p>
			<Utilisateurs dataGET={data} />
			<p>{data.length} Comptes utilisateurs</p>
		</div>
	);
};
