import React from 'react';
import { Link } from 'react-router-dom';

const UserEngagement = () => {
  return (
    <div className="user-engagement">
      <h2>User Engagement</h2>
      {/* Add your user engagement code here */}
      <Link to="/outreach" className="button">Next</Link>
    </div>
  );
};

export default UserEngagement;
