import React, {useEffect, useState} from 'react';
import api from '../services/api';

export default function ProfileList({onSelect}){
  const [profiles,setProfiles] = useState([]);
  useEffect(()=>{
    api.getProfiles().then(r=> setProfiles(r.data)).catch(()=>{});
  },[]);
  return (
    <div>
      <div className="mb-3">
        <button className="px-3 py-1 border rounded">+ Nouveau profil</button>
      </div>
      {profiles.map(p=> (
        <button key={p.id} onClick={()=>onSelect(p)} className="block p-2 border rounded mb-2 w-full text-left">
          {p.name}
        </button>
      ))}
    </div>
  );
}