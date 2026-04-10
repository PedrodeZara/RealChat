import React, { useEffect, useState } from "react";
import styles from "./DisplayMessagesBody.module.css"
import Messageblock from "../messageBlock/Messageblock";
import ContactBay from "../ContactBay/ContactBay";
import useMessageApi from "../../../hooks/useMessagesApi";
import PostMessageSection from "../PostMessageSection/PostMessageSection";

export default function DisplayMessagesBody() {
    const {request, messagesData, loading, error} = useMessageApi();
    const [texto, setTexto] = useState("");
    const [refreshMessages, setRefreshMessages] = useState(0)

    async function postMessage(texto) {
        request("POST", {descricao: texto, id_user: "11111111111", id_contact: "11111111112"}, 11111111111, 11111111112 );
        setTexto("");
        setRefreshMessages(a => a + 1)
    }

    return(
        <main className={styles.mainDisplay}>
            <section className={styles.mainDisplay_glass}></section>
                <ContactBay/>
                <Messageblock refreshMessages={refreshMessages}/>
                <PostMessageSection onSend={postMessage}/>        
        </main>
    );
}