import "./nav.css";

import { NavElement } from "./NavElement";
import { NavLink } from "react-router-dom";

export const Nav = () => {
	return (
		<nav className="nav">
			<NavLink to="/">
				<NavElement linkImg="house">Statistiques</NavElement>
			</NavLink>
			<NavLink to="/comptes">
				<NavElement linkImg="profile">Gestion des comptes</NavElement>
			</NavLink>
			<NavLink to="/parametres">
				<NavElement linkImg="settings">Paramètres</NavElement>
			</NavLink>
		</nav>
	);
};
