import { useNavigate } from "react-router-dom";
import { Button } from "./buttons/Button";

export const Utilisateurs = ({ dataGET }) => {
	const navigate = useNavigate();

	const deleteUser = (id, pseudo) => {
		const confirmed = window.confirm(
			`Êtes-vous sûr de vouloir supprimer l'utilisateur ${pseudo} ?`
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
					alert(data.status_message);
				});
		}
	};
	return (
		<table>
			<thead>
				<tr>
					<td>ID</td>
					<td>Pseudo</td>
					<td>Email</td>
					<td>Actions</td>
				</tr>
			</thead>

			<tbody>
				{dataGET.map((d) => (
					<tr key={d.id_utilisateur}>
						<td>{d.id_utilisateur}</td>
						<td>{d.pseudo_utilisateur}</td>
						<td>{d.email_utilisateur}</td>
						<td>
							<Button
								type={"button"}
								onClick={() => navigate(`/compte/${d.id_utilisateur}`)}
							>
								Modifier
							</Button>
							<Button
								type={"button"}
								onClick={() =>
									deleteUser(d.id_utilisateur, d.pseudo_utilisateur)
								}
							>
								Supprimer
							</Button>
						</td>
					</tr>
				))}
			</tbody>
		</table>
	);
};
