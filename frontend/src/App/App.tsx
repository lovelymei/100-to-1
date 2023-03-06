import * as React from 'react'
import {HashRouter as Router, Route, Link, Routes} from 'react-router-dom';
import {Component} from "react";
import {infoPage} from "../Pages/infoPage";
import {playPage} from "../Pages/playPage";
import {personalAccountPage} from "../Pages/personalAccountPage";

class App extends Component{
    render(){
        return (
            <Router>
                <div>
                    <nav>
                        <Link to="/info">Info</Link>
                        <Link to="/play">Play</Link>
                        <Link to="/personalAccount">Personal Account</Link>
                    </nav>
                    <Routes>
                        <Route path="/info" element={infoPage()}/>
                        <Route path="/play" element={playPage()}/>
                        <Route path="/personalAccount" element={personalAccountPage()}/>
                    </Routes>
                </div>
            </Router>
        );
    }
}

export default App;