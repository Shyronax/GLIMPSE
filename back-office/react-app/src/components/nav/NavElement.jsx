export const NavElement = ({ children, isActive }) => {
    return (
        <div className={isActive ? `nav__item nav__item--active` : `nav__item`}>
            <p className="nav__link">{children}</p>
        </div>
    );
};
