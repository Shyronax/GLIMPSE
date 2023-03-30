import "./Button.css";

export const Button = ({ children, type, onClick, variant }) => {
    const classNames = `${
        variant === "disconnect" ? "button button--disconnect" : "button"
    }${variant === "modifier" ? " button--modifier" : ""}${
        variant === "supprimer" ? " button--supprimer" : ""
    }`;
    return (
        <button className={classNames} type={type} onClick={onClick}>
            {children}
        </button>
    );
};
