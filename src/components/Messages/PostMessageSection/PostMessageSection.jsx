import React, { useEffect, useState } from "react";
import styles from "./PostMessageSection.module.css"
import useMessageApi from "../../../hooks/useMessagesApi";

export default function PostMessageSection({onSend}) {
    const {request, messagesData, loading, error} = useMessageApi();
    const [texto, setTexto] = useState("");

    return(
        <section className={styles.mainDisplay_postMessages}>
            <input className={styles.inputText} type="text" value={texto} onChange={(e) => setTexto(e.target.value)}/>
            <input type="button" className={styles.mainDisplay_postMessages_button} value={">"}
                onClick={async () => {
                    setTexto("");
                    await onSend(texto)
                }}
            />
        </section>
    );
}