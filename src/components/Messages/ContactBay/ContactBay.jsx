import React, { useEffect, useState } from "react";
import useUserApi from "../../../hooks/useUserApi"
import styles from "./ContactBay.module.css"

export default function ContactBay() {
    const { request, loading, dataUser, error } = useUserApi();
    
   useEffect((() => {
        async function fetchData() {
            await request("GET",null, 1);
        }
        fetchData();
    }),[]);

    return(
        <section className={styles.mainDisplay_contactBay}>
            <section className={styles.contato_foto}></section>
            <p>{loading ? "Carregando..." : dataUser?.[0]?.nome}</p>
        </section>
    );
}