import React, {useEffect} from "react";
import ListUser from "./components/User/listUser/ListUser.jsx";
import InsertButton from "./components/User/insertButton/InsertButton.jsx";
import DisplayMessagesBody from "./components/Messages/DisplayMessagesBody/DisplayMessagesBody.jsx";
import "./style.css";

export default function App() {


    return (
    <>
        <main>
          <ListUser/>
          <DisplayMessagesBody/>
        </main>
    </>
  );
}