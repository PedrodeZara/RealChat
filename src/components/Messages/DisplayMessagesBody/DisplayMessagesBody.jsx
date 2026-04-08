import React from "react";
import styles from "./DisplayMessagesBody.module.css"

export default function DisplayMessagesBody() {
    return(
        <main className={styles.mainDisplay}>
            <section className={styles.mainDisplay_glass}></section>
            <section className={styles.mainDisplay_contactBay}><section className={styles.contato_foto}></section><p>Nome Contato</p></section>
            <section className={styles.mainDisplay_messages}></section>
            <section className={styles.mainDisplay_postMessages}><section className={styles.mainDisplay_postMessages_button}></section></section>
        </main>
    );
}