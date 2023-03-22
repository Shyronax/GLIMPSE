import "./Button.css";

export const Button = ({ variant, text, onClick }) => {
  const className = `${variant === "del" ? "del" : "update"}`;
  return (
    <button className={classNames} type={type}>
      {children}
    </button>
  );
};
