import React from 'react';
import { Link } from 'react-router-dom';

const OutreachAwareness = () => {
  return (
    <div className="outreach-awareness">
      <h2>Outreach and Awareness</h2>
      {/* Add your outreach and awareness code here */}
      <Link to="/feedback" className="button">Next</Link>
    </div>
  );
};

export default OutreachAwareness;
