package crc64189db698667396ce;


public class ToDoListActivity
	extends androidx.appcompat.app.AppCompatActivity
	implements
		mono.android.IGCUserPeer
{
/** @hide */
	public static final String __md_methods;
	static {
		__md_methods = 
			"n_onCreate:(Landroid/os/Bundle;)V:GetOnCreate_Landroid_os_Bundle_Handler\n" +
			"";
		mono.android.Runtime.register ("AppAndroid.Views.ToDoListActivity, AppAndroid", ToDoListActivity.class, __md_methods);
	}


	public ToDoListActivity ()
	{
		super ();
		if (getClass () == ToDoListActivity.class) {
			mono.android.TypeManager.Activate ("AppAndroid.Views.ToDoListActivity, AppAndroid", "", this, new java.lang.Object[] {  });
		}
	}


	public ToDoListActivity (int p0)
	{
		super (p0);
		if (getClass () == ToDoListActivity.class) {
			mono.android.TypeManager.Activate ("AppAndroid.Views.ToDoListActivity, AppAndroid", "System.Int32, mscorlib", this, new java.lang.Object[] { p0 });
		}
	}


	public void onCreate (android.os.Bundle p0)
	{
		n_onCreate (p0);
	}

	private native void n_onCreate (android.os.Bundle p0);

	private java.util.ArrayList refList;
	public void monodroidAddReference (java.lang.Object obj)
	{
		if (refList == null)
			refList = new java.util.ArrayList ();
		refList.add (obj);
	}

	public void monodroidClearReferences ()
	{
		if (refList != null)
			refList.clear ();
	}
}
