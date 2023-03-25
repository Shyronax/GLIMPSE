import { useEffect, useState } from "react";
import { UsersList } from "../components/UsersList";
import { Button } from "../components/buttons/Button";
import { useNavigate } from "react-router-dom";

export const Accounts = () => {
	const navigate = useNavigate();

	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/utilisateurs")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	const handleDelete = (id, pseudo) => {
		const confirmed = window.confirm(
			`Êtes-vous sûr de vouloir supprimer l'utilisateur ${pseudo} ? Cette action est irréversible.`
		);
		if (confirmed) {
			fetch(
				"http://localhost/github/glimpse/back-office/back/api/utilisateur/" +
					id,
				{
					method: "DELETE",
				}
			)
				.then((response) => response.json())
				.then((data) => {
					setData((prevData) =>
						prevData.filter((data) => data.id_utilisateur !== id)
					);
					alert(data.status_message);
				});
		}
	};
	return (
		<div>
			<h1>Gestion des comptes</h1>
			<p>Gérez les comptes utilisateurs du site de l’exposition.</p>
			<UsersList dataGET={data} handleDelete={handleDelete} />
			<Button type={"button"} onClick={() => navigate(`/comptes/ajouter`)}>
				Ajouter
			</Button>
			<p>{data.length} Comptes utilisateurs</p>
		</div>
	);
};
