import { UserDetails } from "../components/UserDetails";
import { useEffect, useState } from "react";

export const Settings = () => {
	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/utilisateur/1")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	return (
		<div>
			<h1>Paramètres</h1>
			<p>Modifier les données du compte administrateur.</p>
			<UserDetails dataGET={data} />
		</div>
	);
};
