import { useNavigate } from "react-router-dom";
import { Button } from "./buttons/Button";
import "./UsersList.css";

export const UsersList = ({ dataGET, handleDelete }) => {
    const navigate = useNavigate();
    return (
        <table className="gestion__table" cellSpacing={0}>
            <thead>
                <tr>
                    <th className="table__item">ID</th>
                    <th className="table__item">Nom</th>
                    <th className="table__item">Prénom</th>
                    <th className="table__item">Email</th>
                    <th className="table__item">Actions</th>
                </tr>
            </thead>

            <tbody>
                {dataGET.map((d) => (
                    <tr className="table__cell" key={d.id_utilisateur}>
                        <td className="table__user">{d.id_utilisateur}</td>
                        <td className="table__user">{d.nom_utilisateur}</td>
                        <td className="table__user">{d.prenom_utilisateur}</td>
                        <td className="table__user">{d.email_utilisateur}</td>
                        <td className="table__user">
                            <div className="table__actions">
                                <Button
                                    variant={"modifier"}
                                    type={"button"}
                                    onClick={() =>
                                        navigate(`/compte/${d.id_utilisateur}`)
                                    }
                                >
                                    Modifier
                                </Button>
                                {d.id_utilisateur != 1 && (
                                    <Button
                                        variant={"supprimer"}
                                        type={"button"}
                                        onClick={() =>
                                            handleDelete(
                                                d.id_utilisateur,
                                                d.email_utilisateur
                                            )
                                        }
                                    >
                                        Supprimer
                                    </Button>
                                )}
                            </div>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};
