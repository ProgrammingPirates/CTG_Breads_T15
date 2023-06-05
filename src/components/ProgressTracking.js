import React from 'react';
import { Link } from 'react-router-dom';

const ProgressTracking = () => {
  return (
    <div className="progress-tracking">
      <h2>Progress Tracking</h2>
      {/* Add your progress tracking code here */}
      <Link to="/neighbourhood" className="button">Next</Link>
    </div>
  );
};

export default ProgressTracking;
