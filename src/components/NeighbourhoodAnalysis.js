import React from 'react';
import { Link } from 'react-router-dom';

const NeighbourhoodAnalysis = () => {
  return (
    <div className="neighbourhood-analysis">
      <h2>Neighbourhood Analysis</h2>
      {/* Add your neighbourhood analysis code here */}
      <Link to="/notifications" className="button">Next</Link>
    </div>
  );
};

export default NeighbourhoodAnalysis;
