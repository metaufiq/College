using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class NodeCube : MonoBehaviour {

	private List<GameObject> connector = new List<GameObject>();
	void Start () {
		
	}
	
	public void Link(GameObject data){
		connector.Add (data);
	}

	public bool isConnected(GameObject data){
		return connector.Contains (data);
	}
}
