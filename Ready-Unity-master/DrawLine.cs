using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class DrawLine : MonoBehaviour {
	//lprivate LineRenderer lineRenderer;
	private float Counter;
	private float dist;
 //	public  Transform origin_1;
	//public  Transform destination_1;
	//GameObject vertex;
	private float lineDrawSpeed = 6f;
    checkLine Peta;
    bool[,] cek = new bool[9, 9];
    private List<LineRenderer> render = new List<LineRenderer>();
    public GameObject Renderer;
    private GameObject temporary;
    // Use this for initialization
    void Start () {
        for(int i = 0; i < 9; i++)
        {
            for (int j = 0; j < 9; j++) cek[i, j] = false;
        }
        temporary = GameObject.Find("Main Camera");
        Peta = temporary.GetComponent<checkLine>();
		//if(!origin_1 || !destination_1){
		//	return;
		//}
		//Renderer = GetComponent <LineRenderer> ();
		//lineRenderer.SetPosition (0, origin_1.position);
		//lineRenderer.SetWidth (3f, 3f);
		
		//dist = Vector3.Distance (origin_1.position, destination_1.position);
	}
	
	// Update is called once per frame
	void Update () {
        for(int i = 0; i < 9; i++)
        {
            for(int j = 0; j < 9; j++)
            {
                if (!cek[i,j] && Peta.Graf[i, j] != 0)
                {
                    cek[i, j] = true;
                    cek[j, i] = true;
                    GameObject dataTemp = (GameObject)Instantiate(Renderer, gameObject.transform.position, gameObject.transform.rotation);
                    render.Add(dataTemp.GetComponent<LineRenderer>());
                    render[render.Count - 1].SetPosition(0, Peta.mapping[i].transform.position);
                    render[render.Count - 1].SetWidth(3f, 3f);
                    //dist = Vector3.Distance(Peta.mapping[i].transform.position, Peta.mapping[j].transform.position);
                    //if (Counter < dist)
                    //{
                    //    Counter += .1f / lineDrawSpeed;

                    //    float x = Mathf.Lerp(0, dist, Counter);

                    //    Vector3 pointA = Peta.mapping[i].transform.position;
                    //    Vector3 pointB = Peta.mapping[j].transform.position;

                    //    Vector3 pointAlongLine = x * Vector3.Normalize(pointB - pointA) + pointA;

                    //    render[render.Count - 1].SetPosition(1, pointAlongLine);
                    //    //render[render.Count - 1].SetPosition(1, Peta.mapping[j].transform.position);
                    //}
                    //Vector3 hehe = Peta.mapping[j].transform.position;
                    //Debug.Log("Asli " + hehe);
                    //hehe.y = 33.5f;
                    //render[render.Count - 1].SetPosition(1, hehe);
                    //Debug.Log("Baru " + hehe);
                    render[render.Count - 1].SetPosition(1, Peta.mapping[j].transform.position);
                }
            }
        }
		//if(!origin_1 || !destination_1){
		//	return;
		//}
		//lineRenderer.SetPosition (0, origin_1.position);
		//if (Counter < dist) {
		//	Counter += .1f / lineDrawSpeed;

		//	float x = Mathf.Lerp (0, dist, Counter);

		//	Vector3 pointA = origin_1.position;
		//	Vector3 pointB = destination_1.position;

		//	Vector3 pointAlongLine = x * Vector3.Normalize (pointB - pointA) + pointA;

		//	lineRenderer.SetPosition (1, pointAlongLine);
		
		//}
	}
}
