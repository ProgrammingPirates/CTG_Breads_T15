import React from 'react';
import { Link } from 'react-router-dom';

const CounselingServices = () => {
  return (
    <div className="counseling-services">
      <h2>Counseling and Rehabilitation Services</h2>
      {/* Add your counseling services code here */}
      <Link to="/progress" className="button">Next</Link>
    </div>
  );
};

export default CounselingServices;
