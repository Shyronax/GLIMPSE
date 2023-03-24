import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { UtilisateurDetail } from "../components/UtilisateurDetail";

export const Profile = () => {
	const { id } = useParams();

	let [data, setData] = useState([]);

	useEffect(() => {
		fetch(
			"http://localhost/github/glimpse/back-office/back/api/utilisateur/" + id
		)
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	return <UtilisateurDetail dataGET={data} goBack />;
};
