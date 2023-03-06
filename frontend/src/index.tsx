import App from "./App/App";
import * as React from "react";
import {createRoot} from "react-dom/client";


const element = document.getElementById("root");
console.log(element);
const root = createRoot(element!);

root.render(<App/>);
