import "./nav.css";

import { NavElement } from "./NavElement";
import { NavLink } from "react-router-dom";

export const Nav = () => {
  return (
    <nav className="nav">
      <NavLink to="/">
        <NavElement
          linkName="Statistiques"
          linkImg="house"
          isActive={({ isActive }) => (isActive ? true : false)}
        />
      </NavLink>
      <NavLink to="/comptes">
        <NavElement
          linkName="Gestion des comptes"
          linkImg="profile"
          isActive={({ isActive }) => (isActive ? true : false)}
        />
      </NavLink>
      <NavLink to="/parametres">
        <NavElement
          linkName="Paramètres"
          linkImg="settings"
          isActive={({ isActive }) => (isActive ? true : false)}
        />
      </NavLink>
    </nav>
  );
};
