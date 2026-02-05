import React from "react";
import ListUser from "./components/listUser/ListUser.jsx";
import InsertButton from "./components/insertButton/InsertButton.jsx";
import "./style.css";

export default function App() {
    return (
    <>
        <main>
          <ListUser/>
          <InsertButton/>
        </main>
    </>
  );
}