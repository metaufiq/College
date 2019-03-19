using System.Collections;
using System.Collections.Generic;
using UnityEngine;
[System.Serializable]
public class Edge{
	public GameObject froms, tos;
	public Edge(GameObject fromz, GameObject toz){
		froms = fromz;
		tos = toz;
	}
}
public class CoreMechanismScript : MonoBehaviour {
	private List<LineRenderer> render = new List<LineRenderer>();
	private GameObject currentTarget;
	private List<Edge> edgeData = new List<Edge>();
	public GameObject Renderer;
	void Start () {
		currentTarget = null;
	}
	
	// Update is called once per frame
	void Update () {	
		for (int i = 0; i < edgeData.Count; i++) {
			render [i].SetPosition (0, edgeData [i].froms.transform.position);
			render [i].SetPosition (1, edgeData [i].tos.transform.position);
		}
		RayCasting ();
	}

	void RayCasting(){
		if(Input.GetMouseButtonDown(0)){
			Debug.Log ("Yy");
			RaycastHit hitData;
			Ray rays =  Camera.main.ScreenPointToRay(Input.mousePosition);
			if(Physics.Raycast(rays,out hitData)){
				Debug.Log (hitData.collider.name);

				if(hitData.transform && hitData.collider.name != "Plane"){
					if(currentTarget){
						GameObject dataTemp = Instantiate (Renderer,gameObject.transform);
						render.Add(dataTemp.GetComponent<LineRenderer>());
						Edge temp = new Edge (currentTarget, hitData.collider.gameObject);
						edgeData.Add(temp);
						currentTarget.GetComponent<NodeCube> ().Link (hitData.collider.gameObject);
						hitData.collider.gameObject.GetComponent<NodeCube> ().Link (currentTarget);
						currentTarget = null;

					}else{
						currentTarget = hitData.collider.gameObject;
					}
					Debug.Log (hitData.collider.gameObject.transform.position);
				}
			}
		}
	}
}
