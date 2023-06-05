import React from 'react';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Questionnaire from './components/Questionnaire';
import CounselingServices from './components/CounselingServices';
import ProgressTracking from './components/ProgressTracking';
import NeighbourhoodAnalysis from './components/NeighbourhoodAnalysis';
import Notifications from './components/Notifications';
import DataConfidentiality from './components/DataConfidentiality';
import UserEngagement from './components/UserEngagement';
import OutreachAwareness from './components/OutreachAwareness';
import FeedbackSupport from './components/FeedbackSupport';
import './App.css';

const App = () => {
  return (
    <Router>
      <div className="app">
        <Switch>
          <Route exact path="/" component={Questionnaire} />
          <Route path="/counseling" component={CounselingServices} />
          <Route path="/progress" component={ProgressTracking} />
          <Route path="/neighbourhood" component={NeighbourhoodAnalysis} />
          <Route path="/notifications" component={Notifications} />
          <Route path="/confidentiality" component={DataConfidentiality} />
          <Route path="/engagement" component={UserEngagement} />
          <Route path="/outreach" component={OutreachAwareness} />
          <Route path="/feedback" component={FeedbackSupport} />
        </Switch>
      </div>
    </Router>
  );
};

export default App;
