import React from "react";
import ListUser from "./components/User/listUser/ListUser.jsx";
import InsertButton from "./components/User/insertButton/InsertButton.jsx";
import DisplayMessages from "./components/Messages/displayMessages/DisplayMessages.jsx";
import "./style.css";

export default function App() {
    return (
    <>
        <main>
          <ListUser/>
          <InsertButton/>
          <DisplayMessages/>
        </main>
    </>
  );
}