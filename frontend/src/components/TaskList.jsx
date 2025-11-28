import React, {useEffect, useState} from 'react';
import api from '../services/api';

export default function TaskList({profile}){
  const [tasks,setTasks] = useState([]);
  useEffect(()=>{
    if(!profile) return setTasks([]);
    api.getTasks(profile.id).then(r=> setTasks(r.data)).catch(()=>{});
  },[profile]);
  if(!profile) return <div>Sélectionne un profil</div>;
  return (
    <div>
      <h2 className="text-xl mb-2">{profile.name} — Tâches</h2>
      <ul>
        {tasks.map(t=> <li key={t.id} className="p-2 border rounded mb-2">{t.title} <span className="text-sm text-gray-500">({t.category})</span></li>)}
      </ul>
    </div>
  );
}