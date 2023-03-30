import "./Info.css";

export const Info = ({ number, text }) => {
    return (
        <div className="info">
            <h2 className="info__number">{number}</h2>
            <p className="info__text">{text}</p>
        </div>
    );
};
