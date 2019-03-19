using UnityEngine;
using System.Collections;

public class Bomb8 : MonoBehaviour {
	Vector3 tempPos;
	GameObject view;
	checkLine checkLine;
	public int[] Line_7 = new int[10];

	void OnMouseDown(){
		//to check if the function is work
		//Destroy (gameObject);


		if (transform.position.y <= 53) {
			tempPos = transform.position;
			tempPos.y += 40;
			transform.position = tempPos;
			if (transform.position.y <= 53)
				checkLine.checkVertex [6] = 1;
		}
	}
	// Use this for initialization
	void Start () {
	
	}
	
	// Update is called once per frame
	void Update () {
	
	}
}
